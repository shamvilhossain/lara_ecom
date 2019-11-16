@extends('admin.admin_master')
@section('main_content')



    <div class="flex-center position-ref full-height">
        <div id="app">
            <div class="content">
                <!-- <div class="form-group row"> -->
                    <!-- <div class="col-md-8"> -->
                        
                        
                   <p class="text-center alert alert-danger" v-bind:class="{ hidden: hasError }">
                      Please fill all fields!
                    </p>     
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" 
                        required v-model="newItem.name" placeholder=" Enter some name">
                  </div>
                  <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" 
                        required v-model="newItem.age" placeholder=" Enter your age">
                  </div>
                  <div class="form-group">
                    <label for="profession">Profession:</label>
                    <input type="text" class="form-control" id="profession" name="profession"
                        required v-model="newItem.profession" placeholder=" Enter your profession">
                  </div>

                 <button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
                    <span class="glyphicon glyphicon-plus"></span> ADD
                 </button>

                
                
            </div>
        </div>
    </div>
   <script src="{{asset('public/js/app.js')}}"></script>
    


@endsection   