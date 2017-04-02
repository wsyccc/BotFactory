<script>
    window.onload = function () {
        {sort_script}
        {filterModel_script}
        {filterSeries_script}
    };
</script>

<h1>History View</h1>

<div id="body">
   <!--  transactionId | customerName | date | category | price | description | partId -->
    {pagination}

    <div class="col-xs-12 text-center">
        <form method="post" action="">
            <div class="col-sm-3">
                <select class="form-control" name="order" id="order">
                    <option value="stamp">Date</option>
                    <option value="model">Model</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="filterSeries" id="filterSeries">
                    <option value="all">All</option>
                    <option value="Household">Household</option>
                    <option value="Butler">Butler</option>
                    <option value="Companion">Companion</option>
                    <option value="Motely">Motely</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="filterModel" id="filterModel">
                    <option value="all">All</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="N">N</option>
                    <option value="O">O</option>
                    <option value="P">P</option>
                    <option value="Q">Q</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="T">T</option>
                    <option value="U">U</option>
                    <option value="V">V</option>
                    <option value="W">W</option>
                    <option value="X">X</option>
                    <option value="Y">Y</option>
                    <option value="Z">Z</option>
                </select>
            </div>
            <div class="col-sm-3">
                <input class="btn" type="submit" value="Sort/Filter" />
            </div>
        </form>
    </div>
    
    <table class="table">
      <thead class="thead-inverse">
         <tr>
            <th>Date</th>
            <th>Customer</th>
            <th>Category</th>
            <th>Price</th>
            <th>Part</th>
            <th>Model</th>
            <th>Series</th>
            <th>Description</th>
         </tr>
      </thead>
      <tbody>
         {history}
         <tr>
            <td>
                {date}
            </td>
            <td>
                {customer}
            </td>
            <td>
                {category}
            </td>
            <td>
                {price}
            </td>
            <td>
                {partID}
            </td>
            <td>
                {model}
            </td>
            <td>
                {series}
            </td>
            <td>
                {description}
            </td>
         </tr>
         {/history}
      </tbody>
 </table>
</div>
