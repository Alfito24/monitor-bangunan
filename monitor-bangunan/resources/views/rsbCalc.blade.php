<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="/js/rsb-core/bundle.js"></script>
    <script src="/js/rsb-core/rsbAlgorithm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <script>
        const dataset = <?= json_encode($dataset) ?>;
        console.log(dataset);

        const result = rsbAlgorithm(dataset)
        console.log(result);

        const resultbaru = JSON.stringify(result);

        window.onload = function(){
            document.getElementById('result').value = resultbaru;
            document.forms["myForm"].submit();
        };
    </script>
    <form id="myForm" action="/rsbcalc/store/{{$surveyId}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" id="result" name="result" value=''>
    </form>
    // <script>
    //     // const dataset = <?= json_encode($dataset) ?>;
    //     // console.log(dataset);

    //     // const result = rsbAlgorithm(dataset)
    //     // console.log(result);

    //     // document.location.href=  "/rsbcalc/store/{{$surveyId}}/?result=" + JSON.stringify(result)
    //     //var url = "/rsbcalc/store/{{$surveyId}}";
    //     //const resultbaru = JSON.stringify(result);
    //     var form = $('<form action="' + url + '" method="post">' +
    //         '<input type="hidden" name="_token" value="{{ csrf_token() }}" />' +
    //         '<input type="hidden" name="result" value="'+ JSON.stringify(result) +'" />' +
    //         '</form>');
    //         $('body').append(form);
    //         form.submit();
    //     </script>
    </body>

    </html>
