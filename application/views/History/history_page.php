<h1>History View</h1>

<div id="body">
   <!--  transactionId | customerName | date | category | price | description | partId -->
   <table class="table">
      <thead class="thead-inverse">
         <tr>
            <th>Who</th>
            <th>Category</th>
            <th>Price</th>
            <th>Date</th>
            <th>Description</th>
            <th>Part ID</th>
         </tr>
      </thead>
      <tbody>
         {history}
         <tr>
            <td>
                {customerName}
            </td>
            <td>
                {category}
            </td>
            <td>
                {price}
            </td>
            <td>
                {date}
            </td>
            <td>
                {description}
            </td>
            <td>
                 {partID}
            </td>
         </tr>
         {/history}
      </tbody>
 </table>
</div>
