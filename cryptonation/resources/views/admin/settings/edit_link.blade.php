@extends('admin.base')
@section('admincontent')

<div class="main-content container-fluid">
   <div class="page-title">
      <h3>Settings</h3>
      <p class="text-subtitle text-muted">edit your social media links</p>
   </div>
   <section class="section">
      <div class="row mb-2">
      </div>
      <div class="row mb-4">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body px-0 pb-0">
                  <div class="px-3">
                     <form action="/update_social" method="POST">
                        @csrf

                        <input type="hidden" class="form-control" id="id" name="id" value="{{$link->id}}"
                           placeholder="Enter url" />

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="basicInput">Social media name</label>
                                 <input type="text" class="form-control" disabled id="name" name="name"
                                    value="{{$link->social_name}}" placeholder="Enter url" />
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="basicInput">Social media URL</label>
                                 <input type="text" class="form-control" id="url" name="url"
                                    value="{{$link->social_url}}" placeholder="Enter url" />
                              </div>
                           </div>
                        </div>

                        <div class=" col-md-6 mb-4">
                           <label for="category">Status</label>
                           <fieldset class="form-group">
                              <select class="form-select" id="status" name="status">
                                 <option value="1">active</option>
                                 <option value="0" <?php if($link->status==0) echo 'selected'; ?>>inactive
                                 </option>
                              </select>
                           </fieldset>
                        </div>

                        <div class="col-md-4 mb-4">
                           <button type="submit" href="#" class="btn btn-success round mt-4">
                              Save
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
</div>
<!-- dashboard end -->

@endsection