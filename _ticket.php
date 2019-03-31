<div class="flex-container" data-bookingid=<?php echo $bookingid ?>>
    <div style="flex-grow: 2">
        <p>
            <span class="ticket-header">Departure Date:</span><br>
            <span class="ticket-data"><?php echo $depDate ?></span>
        </p>
    </div>
    <div style="flex-grow: 2">
        <p>
            <span class="ticket-header">Airline:</span><br>
            <span class="ticket-data"><?php echo $airline ?></span>
        </p>
    </div>
    <div style="flex-grow: 6">
        <p>
            <span class="ticket-header">City Departure:</span><br>
            <span class="ticket-data"><?php echo $cityDep ?></span>
        </p>
    </div>
    <div style="flex-grow: 6">
        <p>
            <span class="ticket-header">City Arrival:</span><br>
            <span class="ticket-data"><?php echo $cityArr ?></span>
        </p>
    </div>
    <div style="flex-grow: 2">
        <p>
            <span class="ticket-header">Price:</span><br>
            <span class="ticket-data">$<?php echo $price ?></span>
        </p>
    </div>
</div>
