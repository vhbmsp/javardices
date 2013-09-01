<!DOCTYPE html>
<html xmlns:tal="http://xml.zope.org/namespaces/tal">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Customer List</title>
        <style>
            body {
            color: #6F6F6F;
            font-family: 'Lucida Sans', 'Helvetica',
            'Sans-serif', 'sans';
            font-size: 9pt;
            line-height: 1.8em;
            padding: 10px;
            margin: 10px;
            }

            h1 {
            color: #E9601A;
            font-size: 14pt;
            }

            table.decorated {
            width: 100%;
            border-collapse: collapse;
            }

            table.decorated td {
            padding-right: 5px;
            padding-left: 5px;
            }

            table.decorated thead td {
            font-weight: bold;
            color: #FFF;
            background-color: #CCC;
            }

            table.decorated tbody td {
            border: 1px solid #CCC;
            }
        </style>
    </head>
    <body>
        <h1>Customer List</h1>
        <table class="decorated">
            <thead>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>State</td>
                    <td>Birth Date</td>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
{%for customer in customers %}
                <tr>
		    	<td>{{customer.first_name}}</td>
		    	<td>{{customer.last_name}}</td>
			<td>{{customer.state}}</td>
                    	<td>{{customer.birth_date}}</td>
                    	<td><a href="delete/{{customer.id}}">Delete</a></td>
                </tr>
{% endfor %}
            </tbody>
        </table>
    </body>
</html>
