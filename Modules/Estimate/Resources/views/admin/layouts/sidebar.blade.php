<li class="{{ request()->is('admin/estimate/dashboard') ? 'active' : '' }}">
    <a href="{{ route('admin.estimate.dashboard') }}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>

<li class="{{ request()->is('admin/estimate/estimateSetting/*') ? 'active' : '' }}">
    <a href="#sidebarEstimateSetting" {{ request()->is('admin/estimate/estimateSetting/*') ? 'aria-expanded=true' : '' }}
        data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span> Estimate Setting</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{ request()->is('admin/estimate/estimateSetting/*') ? 'show' : '' }}"
        id="sidebarEstimateSetting">
        <ul class="nav-second-level">

            <li class="{{ request()->is('admin/estimate/estimateSetting/labour') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.labour.index') }}">
                    <span> Labour </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/labourRate') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.labourRate.index') }}">
                    <span> Labour Rate </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/fuel') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.fuel.index') }}">
                    <span> इन्धन </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/fuelRate') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.fuelRate.index') }}">
                    <span> इन्धन दर </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/equipment') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.equipment.index') }}">
                    <span> उपकरण </span>
                </a>
            </li>

            <li class="{{ request()->is('admin/estimate/estimateSetting/equipmentAdditionalCost') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.equipmentAdditionalCost.index') }}">
                    <span> उपकरण अतिरिक्त लागत </span>
                </a>
            </li>

            <li class="{{ request()->is('admin/estimate/estimateSetting/materialType') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.materialType.index') }}">
                    <span> सामग्री प्रकार </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/material') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.material.index') }}">
                    <span> सामग्री </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/materialRate') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.materialRate.index') }}">
                    <span> सामाग्री दर </span>
                </a>
            </li>

            <li class="{{ request()->is('admin/estimate/estimateSetting/materialCollection') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.materialCollection.index') }}">
                    <span> सामग्री संग्रह </span>
                </a>
            </li>
            <li class="{{ request()->is('admin/estimate/estimateSetting/cargoHandling') ? 'active' : '' }}">
                <a href="{{ route('admin.estimate.cargoHandling.index') }}">
                    <span>कार्गो ह्यान्डलिङ</span>
                </a>
            </li>
        </ul>
    </div>
</li>
