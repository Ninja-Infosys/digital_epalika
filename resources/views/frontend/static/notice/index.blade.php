@extends('frontend.layouts.master')
@section('content')
<section class="grievance-list">
    <div class="container">
        <div class="row mt-3">
            <h2>सुचनाहरु</h2>
        <table class="table">
          <thead>
            <tr>
                <th>सि.न</th>
              <th>शीर्षक</th>
              <th>प्रकाशित मिति</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>१.</td>
              <td>लागुपदार्थ को दुरुपयोग</td>
                <td>२०७९-०६-०६</td>
                <td>
                    <button class="btn btn-download btn-light">
                       <a href="/static/single-notice"><i class="fa-solid fa-eye"></i></a>
                    </button>
                </td>   
            </tr>      
   
            <tr class="active">
                <td>१.</td>
                <td>लागुपदार्थ को दुरुपयोग</td>
                  <td>२०७९-०६-०६</td>
                  <td>
                      <button class="btn btn-download btn-light">
                        <a href="/static/single-notice"><i class="fa-solid fa-eye"></i></a>
                      </button>
                  </td>
            </tr>
          </tbody>
        </table>
        </div> 
      </div>
</section>
@endsection

