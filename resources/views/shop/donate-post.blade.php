<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="frm">
    @foreach($fields as $field => $value)
        <input type='hidden' name="{{ htmlentities($field) }}" value="{{ htmlentities($value) }}">
    @endforeach
    <input type="submit" value="Loading PayPal checkout...">
</form>
<script language="JavaScript">
    document.frm.submit();
</script>