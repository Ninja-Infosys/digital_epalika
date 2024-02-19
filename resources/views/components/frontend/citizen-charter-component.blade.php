<table class="overflow-hidden" id="marqueeTable">
    <thead class="sticky-top bg-red ">
    <tr>
        <th scope="col" class="p-1" width="5%">क्र.सं.</th>
        @if(!empty($ward))
            <th scope="col" >शाखा</th>
        @endif

        <th scope="col"  width="10%">सेवा</th>
        <th scope="col" width="55%">आवश्यक कागजातहरु</th>
        <th scope="col" width="15%">सेवा शुल्क</th>
        <th scope="col"  width="15%">लाग्ने समय</th>
        @if(!empty($ward))
            <th scope="col">जिम्मेवार व्यक्ति</th>
        @endif

    </tr>
    </thead>
    <tbody class="move_table table-primary align-top" id="marqueeRows">
    @foreach($citizenCharters as $citizenCharter)
        <tr>
            <th scope="row" class="text-start">{{get_nepali_number($loop->iteration)}}</th>
            @if(!empty($ward))
                <td>{{$citizenCharter->branch?->title ?? ''}}</td>
            @endif
            <td class="text-start">{{$citizenCharter->service}}</td>
            <td class="text-start">
                <textarea class="dynamic-textarea" id="dynamicTextarea{{$loop->iteration}}" readonly>{{$citizenCharter->required_document}}</textarea>
            </td>
            <td class="text-start">{{$citizenCharter->amount}}</td>
            <td class="text-start">{{$citizenCharter->time}}</td>
            @if(!empty($ward))
                <td class="text-start">{{$citizenCharter->responsible_person}}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@push('styles')
    <style>
        .dynamic-textarea {
            border: none;
            display: block;
            margin: 0;
            width: 100%;
            background-color: transparent; /* Set the background to transparent */
            resize: none; /* Disable textarea resizing */
            overflow: hidden; /* Hide scrollbars */
            color: var(--mainColor);
        }

        .bg-red{
            background-color: red;
            color: white;
        }
    </style>
@endpush
@push('scripts')
    <script>
        const marqueeTable = document.getElementById('marqueeTable');
        const marqueeRows = document.getElementById('marqueeRows');
        for (let i = 0; i < 9; i++) {
            const clone = marqueeRows.cloneNode(true);
            marqueeTable.appendChild(clone);
        }
        const clonedRowsHeight = marqueeRows.clientHeight * 20;

        // Reset the scroll position to the top when the animation completes
        marqueeTable.addEventListener('animationiteration', () => {
            marqueeTable.scrollTop = 0;
        });

    </script>
    <script>
        // Adjust the height of the textarea based on its content
        function adjustTextareaHeight(textareaId) {
            const textarea = document.getElementById(textareaId);
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight + 10) + 'px'; // Set the new height
        }

        // Call the function for each textarea when the page loads
        window.addEventListener('load', function() {
            const dynamicTextareas = document.getElementsByClassName('dynamic-textarea');
            for (let i = 0; i < dynamicTextareas.length; i++) {
                adjustTextareaHeight(dynamicTextareas[i].id);
            }
        });

        // Call the function for each textarea whenever the content changes (e.g., user input)
        const dynamicTextareas = document.getElementsByClassName('dynamic-textarea');
        for (let i = 0; i < dynamicTextareas.length; i++) {
            dynamicTextareas[i].addEventListener('input', function() {
                adjustTextareaHeight(this.id);
            });
        }
    </script>
@endpush

@push('styles')
    <style>
        @keyframes marquee {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100%);
            }
        }

        .move_table {
            position: relative;
            box-sizing: border-box;
            animation: marquee {{count($citizenCharters) <=0 ? 10 :count($citizenCharters) * 10}}s linear infinite;
            margin: 0 auto;
            color: var(--mainColor);
        }
    </style>
@endpush

