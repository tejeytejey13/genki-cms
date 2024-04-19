document.addEventListener("DOMContentLoaded", function() {
    const calendar = document.getElementById("calendar");
    const modal = document.getElementById("modal");
    const modalContent = document.querySelector(".modal-content");
    const modalBtn = document.querySelector(".modal-btn");
    const closeBtn = document.querySelector(".close");

    // Initialize current date
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth() + 1;
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
            const eventDate = new Date(date);
            const eventMonth = eventDate.getMonth() + 1;
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

        modalBtn1.classList.add("modal-btn");
        modalBtn2.classList.add("modal-btn");

        modalContent.appendChild(modalBtn1);
        modalContent.appendChild(modalBtn2);
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
