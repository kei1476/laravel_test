$(function () {
    $("#contact-form").validationEngine(
        'attach', {
        promptPosition: "bottomLeft"
    }
    );

    $('#postcode1').jpostal({
        postcode: [
            '#postcode1',
            '#postcode2'
        ],
        address: {
            '#address1': '%3',
            '#address2': '%4',
            '#address3': '%5' 
        }
    });
});
