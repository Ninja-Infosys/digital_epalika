{{-- @foreach ($user->recommendationCreates as $recommendationCreate)
    @foreach ($recommendationCreate->recommendationDetail->revenueHeaders as $revenueHeader)
        <p>{{ $revenueHeader->title }}</p>
        <p>{{ $recommendationCreate->recommendationDetail->title }}</p>
        <p>{{ $recommendationCreate->recommendationDetail->title_en }}</p>
        <p>{{ $recommendationCreate->recommendationDetail->title_en }}</p>
        <p>{{ $recommendationCreate->recommendationDetail->service_cost }}</p>

        <!-- Display other revenue header properties as needed -->
    @endforeach
@endforeach --}}


<p>{{ $user->recommendationCreate->recommendationDetail->title }}</p>