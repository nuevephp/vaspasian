/**
 * @author The Smiths
 */
$(document).ready(function() { 
    $("#pageTable").tablesorter({ 
        // pass the headers argument and assing a object 
        headers: { 
            // assign the secound column (we start counting zero) 
            3: { 
                // disable it by setting the property sorter to false 
                sorter: false 
            } 
        } 
    }); 
});