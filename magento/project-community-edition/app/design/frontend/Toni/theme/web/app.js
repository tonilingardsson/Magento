/**
 * Created by lingardssonluna on 2017-06-05.
 */
$(document).ready(function() {
    console.log(“Documentready”)
    )
    };

    $(“.btn-primary”).on(“click”, function(e) {

        var element = $this);
    //e.preventDefault(); //Det här undviker att funktionen körs utan att fråga för det
        //$(“h1”).fadeOut();
    });
$("#create-page").on("submit", function(e)) {
    var fields = $(this).find("input:text");
    var valid = true;
    var checkField = function(field) {
    var fieldValue = $.trim($(field));
    return (fieldValue !== "");
    };

    $("£error-message").hide();
    fields.removeClass("error");

    //Nollställ förmuläret
    $("error-message").hide();
    fields.removeClass("error");

    fields.on("keyup", function(e) {
        var fieldValue = $.trim($(this).val());
        if (fieldValue !== "") {
            $(this).removeClass("error");
        }

    });

    //Gå igenom fälten och se om de ör ifyllda
    fields-each(function () {
        var fieldValue = $.trim($(this).val());
        if (fieldValue === "") {
            valid = false;
            $(this).addClass("error");
        }
        else {
            $(this).addClass("error");
    }
    });
    //När ett formulärfält tappar focus
    fields.on("blur", function(e) {
    if (!checkField((this)) {
    $(this).addClass("error");
}
});