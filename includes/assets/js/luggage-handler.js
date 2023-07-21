jQuery(document).ready(function($) {
    $(".luggage_count_plus").click(function(e) {
        e.preventDefault();
        var input = $(this).siblings(".luggage_count");
        var currentValue = parseInt(input.val());
        var maxValue = parseInt(input.attr("max"));
        
        if (currentValue < maxValue) {
            input.val(currentValue + 1);
        }
    });
    $(".luggage_count_minus").click(function(e) {
        e.preventDefault();
        var input = $(this).siblings(".luggage_count");
        var currentValue = parseInt(input.val());
        var minValue = parseInt(input.attr("min"));
        
        if (currentValue > minValue) {
            input.val(currentValue - 1);
        }
    });
    $(".luggage_count").on("input", function() {
        var input = $(this);
        var currentValue = parseInt(input.val());
        var maxValue = parseInt(input.attr("max"));
        var minValue = parseInt(input.attr("min"));

        if (currentValue > maxValue) {
            input.val(maxValue);
        } else if (currentValue < minValue) {
            input.val(minValue);
        }
    });
});