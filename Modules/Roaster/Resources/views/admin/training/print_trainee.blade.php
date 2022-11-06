<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Document</title>
</head>
<body>
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
    }
    p{
        text-align: center;
        line-height: 2px;
        color: #ae0000;
    }
</style>




@if($training->form_type==='trainee')
    <table>
        <tr>
            <td>क्र.सं.</td>
            <td>पुरा नाम</td>
            <td>ठेगाना</td>
            <td>नागरिता नं</td>
            <td>सम्पर्क न</td>
            <td>इमेल</td>
            <td> शैक्षिक योग्यता</td>
            <td>लिङ्ग</td>
            <td> जातीयता</td>
            <td> हालको व्यवसाय</td>
        </tr>
        @foreach($training->trainingTrainees as $trainee)
            <tr>
                <td>{{$trainee->model->full_name ??''}}</td>
                <td>{{$trainee->model->localBody->local_body ??''}} {{$trainee->model->ward_no ??''}} {{$trainee->model->district->district ??''}}{{$trainee->model->province->province ??''}}</td>
                <td>{{$trainee->model->citizenship_no??''}}</td>
                <td>{{$trainee->model->phone_no??''}}</td>
                <td>{{$trainee->model->email_id??''}}</td>
                <td>{{$trainee->model->qualification??''}}</td>
                <td>{{$trainee->model->gender??''}}</td>
                <td>{{$trainee->model->ethnicity->title??''}}</td>
                <td>{{$trainee->model->current_profession??''}}</td>
            </tr>
        @endforeach

    </table>
@elseif($training->form_type=== \Modules\Roaster\Enums\TrainingTypeEnum::TECHNICAL_TRAINEE)
    <table>
        <tr>
            <td>क्र.सं.</td>
            <td>पुरा नाम</td>
            <td>ठेगाना</td>
            <td>पद</td>
            <td>सेवा समुह</td>
            <td>सेवा अवधि</td>
            <td>सम्पर्क न</td>
            <td>इमेल</td>
            <td> शैक्षिक योग्यता</td>
        </tr>
        @foreach($training->trainingTrainees as $trainee)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$trainee->model->employee_name ??''}}</td>
                <td>{{$trainee->model->localBody->local_body ??''}} {{$trainee->model->ward_no ??''}} {{$trainee->model->district->district ??''}}{{$trainee->model->province->province ??''}}</td>
                <td>{{$trainee->model->designation->title??''}}</td>
                <td>{{$trainee->model->department->title??''}}</td>
                <td>{{$trainee->model->service_time??''}}</td>
                <td>{{$trainee->model->contact_no??''}}</td>
                <td>{{$trainee->model->email??''}}</td>
                <td>{{$trainee->model->education_qualification??''}}</td>
            </tr>
        @endforeach

    </table>
@else
    <table>
        <tr>
            <td>क्र.सं.</td>
            <td>पुरा नाम</td>
            <td>ठेगाना</td>
            <td>नागरिता नं</td>
            <td>सम्पर्क न</td>
            <td>इमेल</td>
            <td> शैक्षिक योग्यता</td>
            <td>लिङ्ग </td>
            <td> हालको व्यवसाय </td>
        </tr>
        @foreach($training->trainingTrainees as $trainee)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$trainee->model->full_name ??''}}</td>
                <td>{{$trainee->model->localBody->local_body ??''}} {{$trainee->model->ward_no ??''}} {{$trainee->model->district->district ??''}}{{$trainee->model->province->province ??''}}</td>
                <td>{{$trainee->model->citizenship_no??''}}</td>
                <td>{{$trainee->model->phone_no??''}}</td>
                <td>{{$trainee->model->email_id??''}}</td>
                <td>{{$trainee->model->qualification??''}}</td>
                <td>{{$trainee->model->gender??''}}</td>
                <td>{{$trainee->model->current_profession??''}}</td>
            </tr>
        @endforeach

    </table>
@endif

</body>
</html>
