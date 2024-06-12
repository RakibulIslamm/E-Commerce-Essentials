<?php

$city = null;
$state = null;
$country = null;
$street = null;
$email = null;
$telephone = null;
$fax = null;
$iban = null;
$map_iframe = null;

// dd($site_settings);

if (isset($site_settings->corporate_data)) {
    $corporate_data = $site_settings->corporate_data;

    $city = isset($corporate_data['city']) ? $corporate_data['city'] : null;
    $state = isset($corporate_data['state']) ? $corporate_data['state'] : null;
    $country = isset($corporate_data['country']) ? $corporate_data['country'] : null;
    $street = isset($corporate_data['street']) ? $corporate_data['street'] : null;
    $email = isset($corporate_data['email']) ? $corporate_data['email'] : null;
    $telephone = isset($corporate_data['telephone']) ? $corporate_data['telephone'] : null;
    $fax = isset($corporate_data['fax']) ? $corporate_data['fax'] : null;
    $iban = isset($corporate_data['iban']) ? $corporate_data['iban'] : null;
    $map_iframe = isset($corporate_data['map_iframe']) ? $corporate_data['map_iframe'] : null;
}

?>


<div id="address" class="w-full p-5 bg-white rounded-lg shadow border mt-4">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold pb-2">Corporate Data</h2>
        <button id="edit-address" class="px-5 py-1 border rounded">Edit</button>
    </div>
    <p>address goes here</p>
</div>
<div id="address-edit" class="w-full hidden p-5 bg-white rounded-lg shadow mt-4 border">
    <h2 class="text-xl font-semibold pb-2">Edit Corporate Data</h2>
    <form method="POST" action="{{ route('app.corporate-data.update-corporate-data') }}" class="w-full space-y-3">
        @method('PUT')
        @csrf
        <div class="w-full flex justify-between items-start gap-3">
            <div class="w-full">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                <input id="city" name="city" type="text" value="{{ old('city', $city ?? '') }}" required
                    placeholder="Ex: Dhaka"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="w-full">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                <input id="state" name="state" type="text" value="{{ old('state', $state ?? '') }}"
                    placeholder="Ex: Dhaka"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="w-full">
                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                <input id="country" name="country" type="text" value="{{ old('country', $country ?? '') }}"
                    placeholder="Ex: Bangladesh"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="w-full flex justify-between items-start gap-3">
            <div class="w-8/12">
                <label for="street" class="block text-gray-700 text-sm font-bold mb-2">Street</label>
                <input id="street" name="street" type="text" value="{{ old('street', $street ?? '') }}" required
                    placeholder="Ex: 12/A Danmondi, Road 24, Dhaka"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="w-4/12">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $email ?? '') }}" required
                    placeholder="example@gmail.com"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="w-full flex justify-between items-start gap-3">
            <div class="w-full">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Telephone</label>
                <input id="telephone" name="telephone" type="text" value="{{ old('telephone', $telephone ?? '') }}"
                    required placeholder="091315093"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="w-full">
                <label for="fax" class="block text-gray-700 text-sm font-bold mb-2">Fax</label>
                <input id="fax" name="fax" type="text" value="{{ old('fax', $fax ?? '') }}" required
                    placeholder=""
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="w-full">
                <label for="iban" class="block text-gray-700 text-sm font-bold mb-2">IBAN</label>
                <input id="iban" name="iban" type="text" value="{{ old('iban', $iban ?? '') }}" required
                    placeholder=""
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="w-full">
            <label for="map_iframe">Iframe Google Map</label>
            <textarea name="map_iframe"
                class="shadow appearance-none border rounded w-full h-[105px] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('map_iframe', $map_iframe ?? '') }}</textarea>
        </div>
        <div class="flex justify-end gap-2">
            <button type="button" id="cancel-edit-address"
                class="px-5 py-1 border rounded bg-red-500 text-white">Cancel</button>
            <button type="submit" class="px-5 py-1 border rounded bg-sky-500 text-white">Update</button>
        </div>
    </form>
</div>

<script type="module">
    commonUtils.element('edit-address').addEventListener('click', () => {
        commonUtils.toggleVisibility('address-edit', 'address', 'block');
    });

    commonUtils.element('cancel-edit-address').addEventListener('click', () => {
        commonUtils.toggleVisibility('address', 'address-edit', 'block');
    });
</script>
