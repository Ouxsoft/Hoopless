<?php
echo '<div class="container background-white"><h2>Results</h2>';
echo '<p>The following results were found for "<b><u>'.$_GET['q'].'</u></b>"</p>';

echo "<script>
  (function() {
    var cx = '014786476366935271515:l5dzieesi9a';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>";

echo '</div>';
?>
