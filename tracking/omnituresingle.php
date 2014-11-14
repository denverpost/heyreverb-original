<script type="text/javascript">
function ssptrack(params, total){
   frames['click_iframe'].location.href = '<?php echo bloginfo('template_directory') .'/tracking/countercode.html'; ?>?thepagetitle=<?php echo preg_replace('/[^a-z0-9_]/i', '_', $thepagetitle); ?>&thenumber=' + params;
}
</script>

<iframe 
    id="click_iframe" name="click_iframe"
    style="width: 1px;
    height: 1px;
    position:absolute;
    top:1px;
    left:-1000px;
    border: 0px solid #000000;">
</iframe>
