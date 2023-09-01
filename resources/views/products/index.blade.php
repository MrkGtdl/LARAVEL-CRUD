@extends('products.layout')
<style>
    .pull-right, .footer{
    display: flex;
    justify-content: space-between;
    }


</style>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a href="http://127.0.0.1:8000/products"><h2>LARAVEL CRUD</h2></a>
            </div>
        </div>
    </div>

    <div class="pull-right">
                <div class="mt-1 mb-4">
                    <div class="relative max-w-xs">
                        <form action="{{ route('products.index') }}" method="GET">
                            <input type="text" name="s"
                                class="block w-full pl-10 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Search..." />
                        </form>
                    </div>
                </div>
                <a class="btn btn-success" href="{{ route('products.create') }}" style="height: fit-content;"> <i class="fa-solid fa-plus"></i> Create</a>
            </div>

   

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
        <a href="http://127.0.0.1:8000/products" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr class="bg-warning">
            <th width="280px">Action</th>
            <th>Id</th>
            <th>Title</th>
            <th>Details</th>

        </tr>
        @foreach ($products as $product)
        <tr>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-eye"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
            <td>{{ ++$i }}</td>
            <td>{{ $product->productName }}</td>
            <td>{{ $product->productDescription }}</td>
        </tr>
        @endforeach
    </table>
    <!-- footer -->
    <div class="footer">
    <small style="display: flex;justify-content: center;">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} entries</small>
    <span>{!! $products->links() !!}</span>
    </div>

      
@endsection