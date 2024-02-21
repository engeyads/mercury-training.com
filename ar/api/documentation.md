usefull jquery pagination for upcomming events
you can just add the following to the upcomming.php in layouts
<?php echo $eventsArray->pagination(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery.noConflict();
    (function($) {
    $(document).ready(function() {

        // Add a click event handler to the <span> to make an AJAX request
        $('nav .pagination').on('click', '.page-link', function() {
            // Remove the 'active' class from previously active elements
            $('.page-item.active').removeClass('active');

            // Add the 'active' class to the parent .page-item
            $(this).closest('.page-item').addClass('active');
            $.ajax({
                url: '<?php echo $systemUrl; ?>/api/xyz.php?resource=events&upcoming=true&limit=<?php echo $upcomingLimit; ?>&page='+this.innerText,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    updatePagingLinks(data.pageNumber, data.totalPages);
                    updateContent(data);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $('.page-link').css({'cursor': 'pointer', 'color': 'white!important'})
    $('.page-link').each(function() {
        var $link = $(this);
        var $span = $('<span class="page-link">').text($link.text()); // Create a new <span> element

        $link.replaceWith($span); // Replace the <a> with the <span>

        $span.hover(
        function() {
            $(this).css('color', 'red');
        },
        function() {
            $(this).css('color', 'white'); // Reset the color on mouse out
        }
    );
    // Check if the link is active and apply the active style
    if ($link.parent().hasClass('active')) {
        $span.css('color', 'red');
    }
    });

    function updatePagingLinks(currentPage, totalPages) {
    var paginationContainer = $('nav .pagination');
    paginationContainer.empty(); // Clear existing links

    if (totalPages <= 1) {
        return; // No need to display pagination for one page or less
    }

    var prevPage = currentPage - 1;
    var nextPage = currentPage + 1;

    // Create and append the "«" (previous) link
    if (currentPage > 1) {
        paginationContainer.append('<li class="page-item"><span class="page-link" data-page="' + prevPage + '">«</span></li>');
    } else {
        paginationContainer.append('<li class="page-item disabled"><span class="page-link">«</span></li>');
    }

    // Create and append the numeric page links
    var leftBound = Math.max(currentPage - 2, 1);
    var rightBound = Math.min(currentPage + 2, totalPages);

    if (leftBound > 1) {
        paginationContainer.append('<li class="page-item"><span class="page-link" data-page="1">1</span></li>');
        if (leftBound > 2) {
            paginationContainer.append('<li class="page-item"><span class="page-link">...</span></li>');
        }
    }

    for (var i = leftBound; i <= rightBound; i++) {
        var activeClass = (i === currentPage) ? 'active' : '';
        paginationContainer.append('<li class="page-item ' + activeClass + '"><span class="page-link" data-page="' + i + '">' + i + '</span></li>');
    }

    if (rightBound < totalPages) {
        if (rightBound < totalPages - 1) {
            paginationContainer.append('<li class="page-item"><span class="page-link">...</span></li>');
        }
        paginationContainer.append('<li class="page-item"><span class="page-link" data-page="' + totalPages + '">' + totalPages + '</span></li>');
    }

    // Create and append the "»" (next) link
    if (currentPage < totalPages) {
        paginationContainer.append('<li class="page-item"><span class="page-link" data-page="' + nextPage + '">»</span></li>');
    } else {
        paginationContainer.append('<li class="page-item disabled"><span class="page-link">»</span></li>');
    }

}

// Function to format date and time
function formatDateTime(dateTimeStr, isTime, isStartDate) {
    const date = new Date(dateTimeStr);
    
    if (isTime) {
        // Format as time only
        const hours = date.getUTCHours();
        const minutes = date.getUTCMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 === 0 ? 12 : hours % 12;
        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
        return `${formattedHours}:${formattedMinutes} ${ampm}`;
    } else if (isStartDate) {
        // Format start date as day only
        return date.getDate();
    } else {
        // Format end date as "Day Month Year" format
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        return `${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear()}`;
    }
}

// Function to update the content with the AJAX data
function updateContent(data) {
    // Assuming you have a container with ID 'content-container'
    var $contentContainer = $('#content-container');

    // Clear the existing content within the container
    $contentContainer.empty();

    // Generate and append the new content based on the AJAX response data
    var newContent = '';
    if (data.events && data.events.length > 0) {
        data.events.forEach(function(event) {
            const formattedStartTime = formatDateTime(event.startDate, true);
            const formattedEndTime = formatDateTime(event.endDate, true);
            const formattedStartDate = formatDateTime(event.startDate, false, true);
            const formattedEndDate = formatDateTime(event.endDate, false, false);
            newContent += `
            <div class="col-md-3 px-md-2 mb-4">
                <div class="card h-100 d-inline-block border shadow-sm">
                    <a href="<?php echo $systemUrl.$eventPage; ?>/${event.id}" title="${event.name}">
                        <img src="<?php echo $systemUrl; ?>assets/images/cities/${event.cityPhoto}" class="img-fluid" alt="${event.name}">
                    </a>
                    <div class="p-2 description-dark-color">
                        <div class='card-title d-inline-block'>
                            <a href="<?php echo $systemUrl.$eventPage; ?>/${event.id}" title="${event.name}">
                                <h2 class="h3">${event.name}</h2>
                            </a>
                        </div>
                        <div class="f-14">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 512 512">
                                    <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                Time: 9:00 AM To 1:00 PM
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 448 512">
                                    <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" />
                                </svg>
                                Date: <span class="font-weight-bold">${formattedStartDate} To ${formattedEndDate}</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                                </svg>
                                Location: ${event.cityCode}
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 448 512">
                                    <path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path>
                                </svg>
                                Fees: ${event.price} ${event.currency}
                            </div>
                            <div class="m-0 flex">
                                <center>
                                    <a title="${event.name}" class="btn btn-main col-5 flex font-xsm mr-2" href="<?php echo $systemUrl.$eventPage; ?>/${event.id}">More Info</a>
                                    <a title="${event.name}" class="btn btn-main col-5 font-xsm ml-2" href="<?php echo $systemUrl; ?>course/${event.slug}#all-dates-and-locations">Locations</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        });
    } else {
        newContent = 'No events found';
    }

    // Append the new content to the container
    $contentContainer.html(newContent);
}


});
})(jQuery);
</script>