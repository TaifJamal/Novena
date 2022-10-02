<div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
    <h2 class="mb-2 title-color">Book an appoinment</h2>

    @if ( session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
    @endif

    @include('site.error')
    <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
       <form id="#" class="appoinment-form" method="post" action="{{ route('site.appoinment_data_form') }}">
        @csrf
            <div class="row">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                            <option>Choose Department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect2" name="doctor_id">
                        </select>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="form-group">
                        <input name="date"  type="date" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="time" type="time" class="form-control" placeholder="Time">
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                        <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            <div class="form-group-2 mb-4">
                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
            </div>

            <button class="btn btn-main btn-round-full">Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
        </form>
   </div>
