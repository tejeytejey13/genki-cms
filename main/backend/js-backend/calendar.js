document.addEventListener("DOMContentLoaded", function() {
    const calendar = document.getElementById("calendar");
    const modal = document.getElementById("modal");
    const modalContent = document.querySelector(".modal-content");
    const modalBtn = document.querySelector(".modal-btn");
    const closeBtn = document.querySelector(".close");

    // Initialize current date
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    

    // Render initial calendar
    renderCalendar(currentMonth, currentYear);

    function renderCalendar(month, year) {
        calendar.innerHTML = "";

        // var monthYear = $('.month-name').html();
        // var monthName = monthYear.split(" ")[0];
        // var monthYear = monthYear.split(" ")[1];
        // monthName = monthName.charAt(0).toUpperCase() + monthName.slice(1);

        // var monthNumber = new Date(monthName +' 1, ' + monthYear);
        // var mn = monthNumber.getMonth() + 1;
        // var yr = monthNumber.getFullYear();
        

        const monthName = new Intl.DateTimeFormat('en-US', {
            month: 'long'
        }).format(new Date(year, month));

        const monthHeader = document.createElement("div");
        monthHeader.classList.add("month");
        monthHeader.innerHTML = `<div class="month-name">${monthName} ${year}</div>`;
        calendar.appendChild(monthHeader);

        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const gridContainer = document.createElement("div");
        gridContainer.classList.add("grid-container");

        // Add day names
        const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        for (let i = 0; i < 7; i++) {
            const dayName = document.createElement("div");
            dayName.classList.add("day");
            dayName.textContent = dayNames[i];
            gridContainer.appendChild(dayName);
        }

        // Calculate the starting day of the month
        const firstDayOfMonth = new Date(year, month, 1).getDay();

        // Add empty cells for preceding days
        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptyCell = document.createElement("div");
            emptyCell.classList.add("day");
            gridContainer.appendChild(emptyCell);
        }

        // Add days of the month
        for (let i = 1; i <= daysInMonth; i++) {
            const day = document.createElement("div");
            day.classList.add("day");
            day.classList.add("day-number");
            day.textContent = i;

            day.addEventListener("click", function() {
                showModal(monthName, i, year);
            });

            gridContainer.appendChild(day);
        }

        calendar.appendChild(gridContainer);

        // Add navigation buttons
        const btnContainer = document.createElement("div");
        btnContainer.classList.add("btn-container");

        const prevBtn = document.createElement("button");
        prevBtn.classList.add("btn");
        prevBtn.textContent = "Prev";
        prevBtn.addEventListener("click", function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });

        const nextBtn = document.createElement("button");
        nextBtn.classList.add("btn");
        nextBtn.textContent = "Next";
        nextBtn.addEventListener("click", function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });

        var eventDates = JSON.parse(localStorage.getItem('eventDates')) || [];
        var dayCells = document.querySelectorAll('.day-number');
        eventDates.forEach(function(date) {
            const eventDate = new Date(date.date);
            const eventMonth = eventDate.getMonth();
            const eventYear = eventDate.getFullYear();
            const dayOfMonth = eventDate.getDate();
            // console.log(date);

            if (eventMonth === month && eventYear === year) {
                dayCells.forEach(function(dayCell) {
                    if (parseInt(dayCell.textContent) === dayOfMonth) {
                        dayCell.classList.add('event');
                    }
                });
            };
             
        });
        
        

        btnContainer.appendChild(prevBtn);
        btnContainer.appendChild(nextBtn);
        calendar.appendChild(btnContainer);
    }

    function showModal(month, day, year) {
        modal.style.display = "block";
        modalContent.innerHTML = `<p>Slots on ${month} ${day}, ${year}</p>`;

        const modalBtn1 = document.createElement("button");
        const modalBtn2 = document.createElement("button");

        modalBtn1.textContent = "Set AM slot";
        modalBtn2.textContent = "Set PM slot";

        modalBtn1.classList.add("modal-btn", "sched-btn");
        modalBtn1.setAttribute("id", "sched-btn");
        modalBtn1.setAttribute("data-target-sched-btn", "AM");
        modalBtn1.setAttribute("data-target-day", month + " " + day + " " + year);

        modalBtn2.classList.add("modal-btn", "sched-btn");
        modalBtn2.setAttribute("id", "sched-btn");
        modalBtn2.setAttribute("data-target-sched-btn", "PM");
        modalBtn2.setAttribute("data-target-day", month + " " + day + " " + year);

        modalContent.appendChild(modalBtn1);
        modalContent.appendChild(modalBtn2);

        const modalButtons = document.querySelectorAll('.sched-btn');
        modalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const targetValue = button.getAttribute('data-target-sched-btn');
                const targetDay = button.getAttribute('data-target-day');

                setSchedule(targetValue, targetDay);
            });
        });
    }

    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

function setSchedule(targetValue, targetDay) {
    $.ajax({
        type: "POST",
        url: "backend/set-schedule.php",
        data: {
            targetValue: targetValue,
            targetDay: targetDay
        },
        success: function(response) {
            console.log(response.status);
            modal.style.display = "none";
            var data = JSON.parse(response);
            var date = data.day;
            var dayCells = $('.day-number');

            const eventDate = new Date(date);
            const eventMonth = eventDate.getMonth();
            const eventYear = eventDate.getFullYear();
            const dayOfMonth = eventDate.getDate();

            const month = eventDate.getMonth();
            const year = eventDate.getFullYear();

            if(eventMonth === month && eventYear === year) {
                dayCells.each(function() {
                    if(parseInt(this.textContent) === dayOfMonth) {
                        this.classList.add('event');
                    }
                });
            };

            let htmlContent = 
            '<div class="container-selectedDate" >' +
            '<div class="dropdown">' +
            '<button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">' +
            '<span class="icon"><i class="mdi mdi-view-list"></i></span>' +
            '<span class="menu-item-label">' +
            formatDate(date) +
            "</span>" +
            '<span class="dropdown-icon"><i class="mdi mdi-plus"></i></span>' +
            "</button>" +
            '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';

    
            htmlContent += "</ul>";
            htmlContent += "</div>";
            htmlContent += "</div>";
            $("#show-slots").append(htmlContent);   

        } 
        
    });
    
  function formatDate(date) {
    const dateObj = new Date(date);
    const options = { month: "long", day: "numeric", year: "numeric" };
    return dateObj.toLocaleDateString("en-US", options);
  }
}