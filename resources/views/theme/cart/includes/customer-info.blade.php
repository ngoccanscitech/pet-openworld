@php
    $fullname = $fullname ?? $cart_info['ship_name']??'';
    $email = $email ?? $cart_info['ship_email']??'';
    $phone = $phone ?? $cart_info['ship_phone']??'';
    $address = $address ?? $cart_info['address_line1']??'';
    $province = $province ?? $cart_info['state_province']??'';
    $cart_note = $cart_note ?? $cart_info['cart_note']??'';

@endphp
<div class="shipping_content delivery_content">
    <fieldset>
        <h4 class="order-title mb-4">Địa chỉ nhận hàng</h4>
            <div class="mb-3 required">
                <label class="form-label" for="input-firstname">Họ & tên <span class="required-f">*</span></label>
                <input name="ship_name" value="{{ $fullname }}" id="input-firstname" type="text" class="form-control">
            </div>
        <div class="row">
            <div class="col-lg-6 mb-3 required">
                <label class="form-label" for="input-email">E-Mail <span class="required-f">*</span></label>
                <input name="ship_email" value="{{ $email }}" id="input-email" type="email" class="form-control">
            </div>
            <div class="col-lg-6 mb-3 required">
                <label class="form-label" for="input-telephone">Số điện thoại <span class="required-f">*</span></label>
                <input name="ship_phone" value="{{ $phone }}" id="input-telephone" type="tel" class="form-control">
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="mb-3 required">
            <label class="form-label" for="input-address-1">Địa chỉ <span class="required-f">*</span></label>
            <input name="address_line1" value="{{ $address }}" id="input-address-1" type="text" class="form-control">
        </div>

        <div class="mb-3 required">
            <label class="form-label" for="state_province">Tỉnh / Thành phố <span class="required-f">*</span></label>
            <select name="state_province" id="state_province" class="form-control">
                <option value=""> --- Chọn Tỉnh / Thành phố --- </option>
                @foreach($states as $state)
                <option value="{{ $state->name }}" {{ $province == $state->id || $province == $state->name ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    </fieldset>
</div>

<div class="pick_up_content delivery_content" style="display: none;">
    <h4 class="login-title mb-3">Thông tin nhận hàng</h4>
    <div class="mb-3">
        <label class="form-label" for="input-name">Họ và tên <span class="required-f">*</span></label>
        <input name="name" value="{{ $fullname ?? '' }}" id="input-name" type="text" class="form-control">
    </div>
    <div class="mb-3 required">
        <label class="form-label" for="input-phone">Số điện thoại <span class="required-f">*</span></label>
        <input name="phone" value="{{ $phone ?? '' }}" id="input-phone" type="tel" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="input-email">E-Mail <span class="required-f">*</span></label>
        <input name="email" value="{{ $email ?? '' }}" id="input-email" type="email" placeholder="Your Email" class="form-control">
    </div>
    <ul class="list-group my-3 shop-address-list">
        <li class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="radio" id="shop_address" name="shop_address" value="shop_address" checked>
              <label class="form-check-label" for="shop_address"><div>{!! htmlspecialchars_decode(setting_option('pickup_address')) !!}</div></label>
            </div>
        </li>
    </ul>
</div>
<fieldset>
    <div class="">
        <label class="form-label" for="input-company">Ghi chú đơn hàng</label>
        <textarea class="form-control resize-both" rows="3" name="cart_note">{{ $cart_note }}</textarea>
    </div>
</fieldset>