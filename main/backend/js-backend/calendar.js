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
            day.textContent = i;

            if (i % 5 === 0) {
                day.classList.add("event");
                day.title = "Event on " + monthName + " " + i + ", " + year;
            }

            // Add click event listener to each day
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

        btnContainer.appendChild(prevBtn);
        btnContainer.appendChild(nextBtn);
        calendar.appendChild(btnContainer);
    }

    function showModal(month, day, year) {
        modal.style.display = "block";
        modalContent.innerHTML = `<p>Event on ${month} ${day}, ${year}</p>`;

        const modalBtn = document.createElement("button");
        modalBtn.textContent = "Set Schedule";
        modalBtn.classList.add("modal-btn");
        modalContent.appendChild(modalBtn);


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
