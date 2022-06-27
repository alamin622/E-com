<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use File;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( Request $request)
    {
        if ($request->ajax()) {
            $imgurl = 'public/files/product';
            $product = "";
            $query=DB::table('products')->leftJoin('categories','products.category_id','categories.id')
                ->leftJoin('brands','products.brand_id','brands.id')
                ->leftJoin('subcategories','products.category_id','subcategories.id');
               if($request->category_id){
                   $query->where('products.category_id',$request->category_id);
               }
            if($request->brand_id){
                $query->where('products.category_id',$request->brand_id);
            }
            if($request->warehouse){
                $query->where('products.warehouse',$request->warehouse);
            }
            if($request->status==1){
                $query->where('products.status',1);
            }
            if($request->status==0){
                $query->where('products.status',0);
            }
            $product=$query
                ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
                ->get();
            return DataTables::of($product)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($row) use ($imgurl){
                    return '<img src="'.$imgurl.'/'.$row->thumbnail.'" height="30" width="30">';
                })
                //->editColumn('category_name', function ($row){
              //  return $row->category->category_name;
               // })
                ->editColumn('featured', function ($row){
                    if ($row->featured==1){
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_featured"> <i class="fa fa-eye text-danger"></i> Active </a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_featured"> <i class="fa fa-eye text-green"></i> DeActive </a>';
                    }
                })

                ->editColumn('today_deal', function ($row){
                    if ($row->today_deal==1){
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_today_deal"> <i class="fa fa-eye text-danger"></i> Active </a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_today_deal"> <i class="fa fa-eye text-green"></i> DeActive </a>';
                    }
                })

                ->editColumn('status', function ($row){
                    if ($row->status==1){
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_status"> <i class="fa fa-eye text-danger"></i> Active </a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_status"> <i class="fa fa-eye text-green"></i> DeActive </a>';
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn=
                        '<a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm edit"  ><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-info btn-sm edit"  ><i class="fas fa-eye"></i></a>
                      	<a href="'.route('product.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action','category_ name','thumbnail','featured','today_deal','status'])
                ->make(true);
        }

        $product=DB::table('products')->get();
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $warehouse=DB::table('warehouses')->get();
        return view('admin.product.index',compact('product','category','brand','warehouse'));
    }
    public function create()
    {
      //  $data=DB::table('childcategories')->leftJoin('categories','childcategories.category_id','categories.id')
      //      ->leftJoin('subcategories','childcategories.subcategory_id','subcategories.id')
          //  ->select('categories.category_name','subcategories.subcategory_name','childcategories.*')->get();
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
        $childcategory=DB::table('childcategories')->get();
        $brand=DB::table('brands')->get();
        $pickup=DB::table('pickup_points')->get();
        $product=DB::table('products')->get();
        $warehouse=DB::table('warehouses')->get();
        return view('admin.product.create',compact('category','brand','pickup','product','warehouse','subcategory',
            'childcategory'));

    }
    public function store( Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products',
            'subcategory_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'stock_quantity' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
//subcategory id call for category id
        $subcategory = DB::table('subcategories')->where('id',$request->subcategory_id )->first();
        $slug =Str::slug($request->name, '-');

        $data= array();
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name, '-');
        $data['code'] = $request->code;
        $data['category_id'] = $subcategory->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['pickup_point_id'] = $request->pickup_point_id;
        $data['unit'] = $request->unit;
        $data['tags'] = $request->tags;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['video'] = $request->video;
        $data['purchase_price'] = $request->purchase_price;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['stock_quantity'] = $request->stock_quantity;
        $data['size'] = $request->size;
        $data['video'] = $request->video;
        $data['warehouse'] = $request->warehouse;
        $data['description'] = $request->description;
        $data['featured'] = $request->featured;
        $data['today_deal'] = $request->today_deal;
        $data['product_slider'] = $request->product_slider;
        $data['status'] = $request->status;
        $data['trendy_product'] = $request->trendy_product;
        $data['admin_id'] = Auth::id();
        $data['date'] =date('F d, Y');
        $data['month'] = date('F');

        //working with image
        if ($request->thumbnail){
            $thumbnail=$request->thumbnail;
            $photoname= hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
            $thumbnail->move('public/files/product/',$photoname);  //without image intervention
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
            $data['thumbnail']=$photoname;   // public/files/brand/plus-point.jpg

        }


         $images = array();
         if ($request->hasFile('images')){
            foreach ($request->file('images') as $key =>$image){
                $photoname= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $image->move('public/files/product/',$photoname);  //without image intervention
                //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
                array_push($images, $photoname);  // public/files/brand/plus-point.jpg
            }
            $data['images']=json_encode($images);
         }

        /*      $files = [];
              if($request->hasfile('images'))
              {
                  foreach($request->file('images') as $file)
                  {
                      $name = time().rand(1,100).'.'.$file->extension();
                      $file->move('public/files/product/', $name);
                      $files[] = $name;
                  }
              }
              $data= new File();
              $data->images = $files;
              $data->save();*/
        DB::table('products')->insert($data);
        $notification=array('messege' => 'Product Inserted!', 'alert-type' => 'success');
        return redirect()->route("product.index")->with($notification);
       // dd($request->all());
    }

    public function edit( $id)
    {
        $product= Product::findorfail($id);
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->get();
        $childcategory=DB::table('childcategories')->get();
        $brand=DB::table('brands')->get();
        $pickup=DB::table('pickup_points')->get();
        $warehouse=DB::table('warehouses')->get();
        return view('admin.product.edit',compact('category','brand','pickup','product','warehouse','subcategory',
            'childcategory'));
    }

    public function update( Request $request)
    {

        $subcategory = DB::table('subcategories')->where('id',$request->subcategory_id )->first();
        $slug =Str::slug($request->name, '-');

        $id = $request->id;
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name, '-');
        $data['code'] = $request->code;
        $data['category_id'] = $subcategory->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['pickup_point_id'] = $request->pickup_point_id;
        $data['unit'] = $request->unit;
        $data['tags'] = $request->tags;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['video'] = $request->video;
        $data['purchase_price'] = $request->purchase_price;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['stock_quantity'] = $request->stock_quantity;
        $data['size'] = $request->size;
        $data['video'] = $request->video;
        $data['warehouse'] = $request->warehouse;
        $data['description'] = $request->description;
        $data['featured'] = $request->featured;
        $data['today_deal'] = $request->today_deal;
        $data['status'] = $request->status;
        $data['admin_id'] = Auth::id();
        $data['date'] =date('d-m-Y');
        $data['month'] = date('F');
        DB::table('products')->where('id',$id)->update($data);
        // dd($data);
        $notification=array('messege' => 'Page Updated!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }

    public function destroy($id)
    {
        $product =Product::where('id',$id)->first();
        $product->delete();

        $notification=array('messege' => 'Product Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
//*************active deactive featured***************
    public function Activefeatured($id){
        DB::table('products')->where('id', $id)->update(['featured'=>1]);
        $notification=array('messege' => 'Featured Deactive!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function Deactivefeatured($id){
        DB::table('products')->where('id', $id)->update(['featured'=>0]);
        $notification=array('messege' => 'Featured Active!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
//*************active deactive todays deal***************
    public function Activetodaysdeal($id){
        DB::table('products')->where('id', $id)->update(['today_deal'=>1]);
        $notification=array('messege' => 'today_deal Deactive!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function Deactivetodaysdeal($id){
        DB::table('products')->where('id', $id)->update(['today_deal'=>0]);
        $notification=array('messege' => 'today_deal Active!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
//*************active deactive status***************
    public function Activestatus($id){
        DB::table('products')->where('id', $id)->update(['status'=>1]);
        $notification=array('messege' => 'Status Deactive!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function Deactivestatus($id){
        DB::table('products')->where('id', $id)->update(['status'=>0]);
        $notification=array('messege' => 'Status Active!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
