<script src="https://api.fondy.eu/static_common/v1/checkout/ipsp.js"></script>
<script>
    var button = $ipsp.get('button');
    button.setMerchantId(1396424);
    button.setAmount('', 'USD');
    button.setHost('api.fondy.eu');
    button.setResponseUrl('http://demo.local/payment/callback');
    button.addField({
        label: 'user_id',
        value: '{{Auth::user()->id}}',
        readonly: true
    });
</script>
<button onclick="location.href=button.getUrl()">riseUp balance</button>