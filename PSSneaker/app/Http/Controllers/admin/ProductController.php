<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\color;
use App\Models\Size;
use App\Models\Mapping;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected function fixImage($product)
    {
        if (Storage::disk('public')->exists($product->image)) {
            $product->image = Storage::url($product->image);
        } else {
            $product->image = '/Images/NoImage.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lstproduct = Product::paginate(10);
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        if ($request->ajax()) {
            return view('admin.product.pagination_data', ['lstproduct' => $lstproduct]);
        }
        return view('admin.product.index', ['lstproduct' => $lstproduct]);
    }

    public function search(Request $request)
    {
        $lstproduct = Product::where('SKU', 'LIKE', '%' . $request->keyword . '%')->orWhere('name', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        if ($request->ajax()) {
            if ($lstproduct->count() >= 1) {
                return view('admin.product.pagination_data', ['lstproduct' => $lstproduct]);
            } else {
                return response()->json([
                    'status' => 'Không có dữ liệu',
                ]);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstproduct = Product::all();
        $lstmanufacturer = Manufacturer::all();
        $lstcolor = color::all();
        return view('admin.product.add', compact(['lstproduct', 'lstmanufacturer', 'lstcolor']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'SKU' => 'required|unique:products,SKU,NULL,id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên Sản Phẩm Không Được Bỏ Trống',
                'SKU.required' => 'Mã Sản Phẩm Không Được Bỏ Trống',
                'SKU.unique' => 'Mã Sản Phẩm Không Được Trùng',
            ]
        );
        $product = new product;
        $regular_price = str_replace(",", "", $request->input('regular_price'));
        $sale_price = str_replace(",", "", $request->input('sale_price'));
        $product->fill([
            'name' => $request->input('name'),
            'SKU' => $request->input('SKU'),
            'describe' => $request->input('desc_cke'),
            'regular_price' => $regular_price,
            'sale_price' => $sale_price,
            'discount' => $request->input('discount'),
            'id_manufacturer' => $request->get('lstmanufacturer'),
            'id_color' => $request->get('lstcolor'),
            'outstanding' => $request->has('outstanding') ? '1' : '0',
            'image' => '',
        ]);
        $product->save();
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images/product/', 'public');
        }
        $product->save();
        return Redirect::route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->fixImage($product);
        $lstmanufacturer = Manufacturer::all();
        $lstcolor = color::all();
        return view(
            'admin.product.edit',
            compact('product', 'lstmanufacturer', 'lstcolor')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'SKU' => 'required',
            ],
            [
                'name.required' => 'Tên Sản Phẩm Không Được Bỏ Trống',
                'SKU.required' => 'Mã Sản Phẩm Không Được Bỏ Trống',
            ]
        );
        $regular_price = str_replace(",", "", $request->input('regular_price'));
        $sale_price = str_replace(",", "", $request->input('sale_price'));
        $data = [
            'name' => $request->input('name'),
            'SKU' => $request->input('SKU'),
            'describe' => $request->input('desc_cke'),
            'regular_price' => $regular_price,
            'sale_price' => $sale_price,
            'discount' => $request->input('discount'),
            'id_manufacturer' => $request->get('lstmanufacturer'),
            'id_color' => $request->get('lstcolor'),
            'outstanding' => $request->has('outstanding') ? '1' : '0',
        ];
        if (request()->hasFile('image')) {
            $imagePath = public_path('storage/' . $product->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/product/', 'public');
                    $data['image'] = $image;
                    $product->update($data);
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/product/', 'public');
            $data['image'] = $image;
            $product->update($data);
        }
        $product->update($data);
        return Redirect::route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product_id = $request->input('deleteting_id');
        $product = Product::find($product_id);
        $imagePath = public_path('storage/' . $product->image);
        if (File::exists($imagePath)) {
            if ($imagePath == (public_path('storage/'))) {
                $product->delete();
            } else {
                unlink($imagePath);
            }
        }
        $product->delete();
        return Redirect::route('product.index');
    }
    /* Stock */
    public function stock($id)
    {
        $lststock = Mapping::where('id_product', $id)->get();
        $lstsize = Size::all();
        $id_product = $id;
        return view('admin.product.stock', compact(['lststock', 'lstsize', 'id_product']));
    }

    public function insert(Request $request)
    {
        $stock = new Mapping;
        $stock->fill([
            'id_product' => $request->input('idproduct'),
            'id_size' => $request->get('lstsize'),
            'quantity' => $request->input('quantity'),
        ]);
        $stock->save();
        return Redirect::route('product.stock', $request->input('idproduct'));
    }

    public function delete(Request $request)
    {
        $stock_id = $request->input('deleteting_id');
        $stock = Mapping::find($stock_id);
        $stock->delete();
        return Redirect::route('product.stock', $request->input('idproduct'));
    }

    public function editstock($id)
    {
        $stock = Mapping::find($id);
        return response()->json([
            'status' => 200,
            'size' => $stock->size->size,
            'quantity' => $stock->quantity,
        ]);
    }
    public function refresh(Request $request)
    {
        $stock_id = $request->input('updateting_id');
        $stock = Mapping::find($stock_id);
        $stock->fill([
            'id_product' => $request->input('idproduct'),
            'id_size' => $request->get('lstsize'),
            'quantity' => $request->input('quantity'),
        ]);
        $stock->save();
        return Redirect::route('product.stock', $request->input('idproduct'));
    }

    /* Library */
    protected function fixImageLib($library)
    {
        if (Storage::disk('public')->exists($library->image)) {
            $library->image = Storage::url($library->image);
        } else {
            $library->image = '/Images/NoImage.jpg';
        }
    }
    public function library($id)
    {
        $lstlibrary = Library::where('id_product', $id)->get();
        foreach ($lstlibrary as $library) {
            $this->fixImage($library);
        }
        $id_product = $id;
        return view('admin.product.library', ['lstlibrary' => $lstlibrary, 'id_product' => $id_product]);
    }
    public function insertlib(Request $request)
    {
        $library = new Library;
        $library->fill([
            'id_product' => $request->input('idproduct'),
            'image' => '',
        ]);
        $library->save();
        if ($request->hasFile('image')) {
            $library->image = $request->file('image')->store('images/library/', 'public');
        }
        $library->save();
        return Redirect::route('product.library', $request->input('idproduct'));
    }
    public function editlib($id)
    {
        $library = Library::find($id);
        return response()->json([
            'status' => 200,
            'image' => $library->image,
        ]);
    }
    public function updatelib(Request $request)
    {
        $library_id = $request->input('updateting_id');
        $library = library::find($library_id);
        $library->fill([
            'id_product' => $request->input('idproduct'),
        ]);
        if (request()->hasFile('image')) {
            $imagePath = public_path('storage/' . $library->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/library/', 'public');
                    $library->image = $image;
                    $library->save();
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/library/', 'public');
            $library->image = $image;
            $library->save();
        }
        $library->save();
        return Redirect::route('product.library', $request->input('idproduct'));
    }
    public function deletelib(Request $request)
    {
        $library_id = $request->input('deleteting_id');
        $library = Library::find($library_id);
        $imagePath = public_path('storage/' . $library->image);
        if (File::exists($imagePath)) {
            if ($imagePath == (public_path('storage/'))) {
                $library->delete();
            } else {
                unlink($imagePath);
            }
        }
        $library->delete();
        return Redirect::route('product.library', $request->input('idproduct'));
    }
}
