<html>
<head>
<title>Add Student</title>
</head>
<body>
<form action="localhost/HMS/patientadded.php" method="post">
    
    <b>Add a New Student</b>
    
    <p>Doctor ID:
<input type="text" name="Docid" size="30" value="" />
</p>

<p>Patient Name:
<input type="text" name="PatientName" size="30" value="" />
</p>

<p>Patient Contact Number:
<input type="text" name="PatientContno" size="30" value="" />
</p>

<p>Patient Email:
<input type="text" name="PatientEmail" size="30" value="" />
</p>

<p>Patient Gender:
<input type="text" name="PatientGender" size="30" value="" />
</p>

<p>Patient Address:
<input type="text" name="PatientAdd" size="30"  value="" />
</p>

<p>Patient Medical history:
<input type="text" name="PatientMedhis" size="30" maxlength="5" value="" />
</p>

<p>Patient Age:
<input type="number" name="PatientAge" size="30" value="" />
</p>

<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>