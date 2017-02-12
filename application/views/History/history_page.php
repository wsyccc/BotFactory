<h1>History View</h1>

<div id="body">
   <!-- WHO | CATEGORY | TYPE | PRICE | DESCRIPTION | DATE -->
   <table class="table">
      <thead class="thead-inverse">
         <tr>
            <th>Who</th>
            <th>Category</th>
            <th>Type</th>
            <th>Price</th>
            <th>Date</th>
            <th>Description</th>
         </tr>
      </thead>
      <tbody>
         {history}
         <tr>
            <td>
                {who}
            </td>
            <td>
                {category}
            </td>
            <td>
                {type}
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
         </tr>
         {/history}
      </tbody>
 </table>
</div>
