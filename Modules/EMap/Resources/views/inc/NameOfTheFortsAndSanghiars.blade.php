<ul class="text-decoration-none list-unstyled m-0 p-0">
    <li>पुर्बतर्फ : {{get_nepali_number($actualSetBack->east ?? '') ?? '..............'}} फिटसम्म आफ्नै जग्गा/पछि
        श्री {{get_nepali_number($towards->east ?? '') ?? '..............'}}</li>
    <li>पश्चिमतर्फ : {{get_nepali_number($actualSetBack->west ?? '') ?? '..............'}} फिटसम्म आफ्नै जग्गा/पछि
        श्री {{get_nepali_number($towards->west ?? '') ?? '..............'}}</li>
    <li>उत्तरतर्फ : {{get_nepali_number($actualSetBack->north ?? '') ?? '..............'}} फिटसम्म आफ्नै जग्गा/पछि
        श्री {{get_nepali_number($towards->north ?? '') ?? '..............'}}</li>
    <li>दक्षिणतर्फा : {{get_nepali_number($actualSetBack->south ?? '') ?? '..............'}} फिटसम्म आफ्नै जग्गा/पछि
        श्री {{get_nepali_number($towards->south ?? '') ?? '..............'}}</li>
</ul>
