// Get current year

$('#year').text(new Date().getFullYear());

// Quantity increment
$('#cart-plus').on('click', function () {
    var value = parseInt($(this).prev('input').val());
    $(this).prev('input').val(value + 1).change();
    return false;
});

// Quantity decrement
$('#cart-minus').on('click', function () {
   var value = parseInt($(this).next('input').val());

   if (value !== 1 && value > 0)
   {
       $(this).next('input').val(value - 1).change();
   }
   return false;
});
