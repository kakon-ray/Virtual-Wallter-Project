<!DOCTYPE html>
<html>

    <head>
        <title>Download Pdf</title>
    </head>

    <body>
        <div class="container" style="text-align: center">
            <div class="row">
                <div style="padding: 10px">
                    <h2>Passport Front and Back Image</h2>
                    <div class="col-lg-6">
                        <img src="{{ public_path('uploads/' . $passport_front) }}" style="width: 200px; height: 200px">
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ public_path('uploads/' . $passport_back) }}" style="width: 200px; height: 200px">
                    </div>
                </div>

                <h2>National ID Card Front and Back Image</h2>
                <div class="col-lg-6">
                    <img src="{{ public_path('uploads/' . $id_front) }}" style="width: 200px; height: 200px">
                </div>
                <div class="col-lg-6">
                    <img src="{{ public_path('uploads/' . $id_back) }}" style="width: 200px; height: 200px">
                </div>

            </div>
        </div>
    </body>

</html>
