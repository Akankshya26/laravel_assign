<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


</head>

<body>
    <center>
        <table border=1>
            <a href="{{ url('pedit') }}"></a>
            <div class="card-body">
                <img alt="" style="width:200px;" title="" class="img-circle img-thumbnail isTooltip"
                    src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">
            </div>
            <div class="card-body">
                <strong>Information</strong><br>
                <div class="m-4">


                    <tbody>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                    Name ::
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{ Auth::user()->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                    Email::
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{ Auth::user()->email }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Phone::
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{ Auth::user()->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Address::
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{ Auth::user()->address }}
                            </td>
                        </tr>
                    </tbody>
        </table>



        </div>

        </div>
        </div>
        </div>
    </center>
</body>

</html>
