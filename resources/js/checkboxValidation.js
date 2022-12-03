function handleData()
{
    var form_data = new FormData(document.querySelector("form"));
    console.log(form_data);
    if(!form_data.has("spec_name[]"))
    {
        document.getElementById("chk_option_error").style.visibility = "visible";
    }
    else
    {
        document.getElementById("chk_option_error").style.visibility = "hidden";
    }
    return false;
}

let form = document.querySelector("form");
form.addEventListener("submit", function () {
    return handleData();
});
