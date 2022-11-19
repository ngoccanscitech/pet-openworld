@extends('admin.layouts.app')
@section('seo')
<?php
$data_seo = array(
    'title' => 'List User | '.Helpers::get_option_minhnn('seo-title-add'),
    'keywords' => Helpers::get_option_minhnn('seo-keywords-add'),
    'description' => Helpers::get_option_minhnn('seo-description-add'),
    'og_title' => 'List User | '.Helpers::get_option_minhnn('seo-title-add'),
    'og_description' => Helpers::get_option_minhnn('seo-description-add'),
    'og_url' => Request::url(),
    'og_img' => asset('images/logo_seo.png'),
    'current_url' =>Request::url(),
    'current_url_amp' => ''
);
$seo = WebService::getSEO($data_seo);


?>
@include('admin.partials.seo')
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">List Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">List Users</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  	<div class="container-fluid">
	    <div class="row">
	      	<div class="col-12">
	        	<div class="card">
		          	<div class="card-header">
		            	<h3 class="card-title">List Users</h3>
		          	</div> <!-- /.card-header -->
		          	<div class="card-body">
                        <table class="table table-bordered" id="table_index">
                            <thead>
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_user as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.userDetail', $user->id) }}" title="">{{ $user->fullname }}</a>
                                        <span class="badge badge-primary">{{ $user->expert==1?'Tác giả':'' }}</span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if($user->avatar)
                                        <img src="{{ asset($user->avatar) }}" alt="" height="70" style="height: 70px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->status == 0)
                                        <span class="badge badge-danger">Ngưng hoạt động</span>
                                        @else
                                        <span class="badge badge-success">Hoạt động</span>
                                        @endif
                                        <br>
                                        {!! $user->created_at !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.userDetail', $user->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pen"></i> Edit</a><a href="" title=""></a>
                                        <a href="{{ route('admin.delUser', $user->id) }}" class="btn btn-outline-danger btn-sm btn_deletes"><i class="fa fa-trash"></i> Remove</a><a href="" title=""></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
		        	</div> <!-- /.card-body -->
	      		</div><!-- /.card -->
	    	</div> <!-- /.col -->
	  	</div> <!-- /.row -->
  	</div> <!-- /.container-fluid -->
</section>
<script type="text/javascript">
    jQuery(document).ready(function ($){
        $('#deleteBtn').click(function() {
            if(confirm('Bạn có chắc muốn xóa tài khoản này?')){
                return true;
            }
            return false;
        });

        $('#table_index').DataTable();
        $('#table_index tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[0]+'\'s row' );
        } );
        
    });
</script>
@endsection