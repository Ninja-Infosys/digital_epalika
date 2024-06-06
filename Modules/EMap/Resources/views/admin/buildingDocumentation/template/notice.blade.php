<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/icons.min.css') }}">
    <title>{{ $buildingDocument->name }}को फर्म दर्ता आवेदन</title>

</head>

<body class="container bg-white">
<section class="row justify-content-center my-4 ">
    <div class="card col-md-8 border">
        <div class="card-body">
            <p class="text-danger">नोट: आवेदन अनिवार्य प्रिन्ट गरि कार्यालयमा हाजिर हुनुहोला</p>
            <x-print-button target-element="printData" title="{{ $buildingDocument->name }}"/>
            <div id="printData">



                <table cellspacing="0" style="border-collapse:collapse; border:none; width:100%">
                    <tbody>
                    <tr>
                        <td style="width:25%"><img alt="Office Logo"
                                                   src="http://127.0.0.1:8000/assets/backend/images/np.png"
                                                   style="height:100px; width:130px"/></td>
                        <td style="text-align:center; vertical-align:middle; width:50%">
                            <div ><span
                                    style="font-size:14px"><strong>अनुसूची-३</strong></span><br/>
                                <span style="font-size:14px"><strong>निर्देशिकाको दफा ५ (घ) संग सम्वन्धित</strong></span>
                            </div>

                            <div style="font-size:19px; line-height:1.2">बागचौर नगरपालिका </div>

                            <div style=" font-size:19px; line-height:1.2">...................नं वडा कार्यालय
                            </div>
                            <div style="font-size:19px; line-height:1.2">.............................
                            </div>


                        </td>


                        <td style="width:25%">&nbsp;</td>
                        <td style="width:25%">&nbsp;</td>
                    </tr>

                    </tbody>
                </table>

                <div class="row sub-title mt-3">
                    <div class="col-sm sub-title1">
                        <p class=" fw-bold lh-1">पत्र संख्या : ................</p>
                        <p class="mt-1  fw-bold lh-1">चलानी नम्बर : ...............</p>
                    </div>
                    <div class="col-sm sub-title2 text-end ml-auto">
                        <p class=" fw-bold lh-1"
                           style="text-align: end;">मिती :
                            ......................</p>
                    </div>
                </div>
                <p class="fw-bold fs-5 text-center my-3">
                    ७ दिने सूचना ।
                </p>
                <p style="font-size:18px; text-align: justify">
                    <span class="dashed-bottom"> {{$buildingDocument->province->province ?? ''}},{{$buildingDocument->district->district ?? ''}},{{$buildingDocument->localBody->local_body ?? ''}}-{{ get_nepali_number($buildingDocument->ward_no ?? '') }} </span> वस्ने श्री {{$buildingDocument->applicant_name}} ले बागचौर नगरपालिका वडा नं {{ get_nepali_number($buildingDocument->ward_no ?? '') }} को साबिक.....गाविस वडा नं..... कित्ता नं..............क्षेत्रफल......को<br>
                    पूर्व तर्फ ..................<br>
                    पश्चिम तर्फ.................<br>
                    उत्तर तर्फ..................<br>
                    दक्षिण तर्फ..................<br>
                    यति चार किल्ला भित्रको जग्गामा तपशिलं बमोजिमको निर्माण भए अनुसारको घर अभिलेखिकरण गरी पाउँ भनि मिति...............मा निवेदन दिनु भएकोले सो घरको साध संधियार कोहि कसैलाइ पिरमर्मा परेको भए आफुलाइ परेको सबै विवरण यो सूचना प्रकाशित भएको मितिले ७ दिन भित्र वडा कार्यालयमा उजुर बाजुर गर्नुहुन यो सुचना प्रकाशित गरिएको छ । म्यादभित्र पर्न नआएका उजुर प्रति कुनै कारबाही गरिने छैन ।<br>
                </p>
                <p class="text-decoration-underline fw-bold fs-5">तपशिल</p>
                  <p>१. घरको किसिम <br>
                    २. लम्बाई <br>
                    ३. चौडाई <br>
                    ४. उचाई <br>
                    ५. अन्य <br></p>
                <div class="col-sm text-end font-weight-bold">
                    <p class="ml-4">....................<br>वडा अध्यक्ष</p>
                </div>

        </div>
        </div>
    </div>
    </section>
    <script src="{{ asset('assets/backend/print/print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
