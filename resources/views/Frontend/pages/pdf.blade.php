
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>pdf</title>

 </head>
 <body>
   <div style="width:100%; margin-left:auto;margin-right:auto; display:flex; align-items:center;justify-content:center; border:1px solid red;">
    
    <table style="
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;" >
      <thead>
        <tr>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Name</th>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Email</th>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Address</th>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Phone</th>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Invoice</th>
          <th style="text-align: center !important;
          padding: 0.75rem;
          vertical-align: top;
          border-top: 1px solid #dee2e6;">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $item)
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->ship_first_name}}</td>
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->ship_email}}</td>
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->address}}</td>
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->ship_phone}}</td>
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->total}}</td>
        <td style="text-align: center !important;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;">{{$item->invoice_no}}</td>
        @endforeach
      </tbody>
    </table>

   </div>
 </body>
 </html>


  