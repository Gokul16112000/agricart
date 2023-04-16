@extends('vendor.vendor_dashboard')
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
<img src="{{ (!empty($vendorData->photo))? url('upload/vendor_images/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="Vendor" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{$vendorData->name}}</h4>
												<p class="text-secondary mb-1">{{$vendorData->email}}</p>
												<!--new field--><p class="text-muted font-size-sm"></p>
											
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                        <form method="post" action="{{route('vendor.profile.store')}}" enctype="multipart/form-data">
                                            @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">User Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="{{$vendorData->username}}" disabled/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Shop Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="name" class="form-control" value="{{$vendorData->name}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="email" class="form-control" value="{{$vendorData->email}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="phone" class="form-control" value="{{$vendorData->phone}}" />
											</div>
										</div>

 
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text"  name="address" class="form-control" value="{{$vendorData->address}}" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Join Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="2000" {{$vendorData->vendor_join===2000 ?'selected':''}}>2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Info</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info" rows="3"  >{{$vendorData->vendor_short_info}}</textarea>
												
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Photo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" name="photo" class="form-control" id="image"/>
											</div>
										</div>  

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ (!empty($vendorData->photo))? url('upload/vendor_images/'.$vendorData->photo):url('upload/no_image.jpg') }}" alt="Vendor" style="width:100px;height:100px;">
											</div>
										</div>  
                                        

										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
											</div>
										</div>
									</div>
</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>






<script type="text/javascript">
$(document).ready(function(){
$('#image').change(function(e){
    var reader=new FileReader();
    reader.onload=function(e){
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
});
});

</script>


@endsection		