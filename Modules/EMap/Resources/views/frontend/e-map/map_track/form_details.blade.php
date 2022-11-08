@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right text-white"></i>
                        <a href="{{route('mapTrack')}}" class=" text-primary-500 text-center">नक्सा ट्रयाक</a>
                        <i class="fa fa-angle-double-right text-white"></i>
                        <a class=" text-primary-500 text-center">नक्सा विवरण</a>
                    </div>
                </div>
                <h4 class="fw-semibold text-center">नक्सा विवरण</h4>
            </div>
            <div class="card-body p-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th >क्र.स</th>
                        <th >निवेदन/प्रतिवेदन किसिम</th>
                        <th >स्थिति</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>१.</td>
                        <td>नक्सा बनाउने प्राविधिकद्धारा मन्जुरी पत्र</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>२.</td>
                        <td>भवन डिजाईनको प्राविधिकद्धारा मन्जुरी पत्र</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>३.</td>
                        <td>भवन निर्माण गर्ने ठेकेदारद्धारा मन्जुरी पत्र</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>४.</td>
                        <td>भवन डिजाईन विवरण</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>५.</td>
                        <td>भवन अनुपालन चेकलिष्ट</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>६.</td>
                        <td>दस्तुर तथा दर्ता सम्बन्धी</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>७.</td>
                        <td>संधियारको नाममा जारी भएको सूचनाबारे</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>८.</td>
                        <td>सूचना बुझाएको भर्पाई तथा टाँस मुचुल्का बारे</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>९.</td>
                        <td>सार्जमिन मुचुल्का</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>१०.</td>
                        <td>सार्जमिनमा उ.न.पा.प्राविधिकको प्रतिवेदन</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>११.</td>
                        <td>अमिन प्रतिवेदन</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>१२.</td>
                        <td>प्लिन्थ लेभलसम्मको निर्माण कार्य इजाजतको लागि निवेदन
                        </td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>१३.</td>
                        <td>लेआउट तथा जग जाँचको लागि निवेदन</td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>१४.</td>
                        <td>लेआउट गरेको प्रतिवेदन</td>
                        <td class="text-center"><i class="fas fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>१५.</td>
                        <td>सुपरस्ट्रक्चरको निर्माण कार्य इजाजतको लागि निवेदन
                        </td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>१६.</td>
                        <td>निर्माण कार्य सम्पन्न प्रमाण-पत्रको लागि निवेदन
                        </td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>१७.</td>
                        <td>वारेसनामा</td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>१८.</td>
                        <td>मन्जुरीनामा</td>
                        <td class="text-center"><a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                                <span>फार्म भर्नुहोस्</span>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

