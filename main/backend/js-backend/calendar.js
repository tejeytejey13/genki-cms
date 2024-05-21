document.addEventListener("DOMContentLoaded", function() {
    const calendar = document.getElementById("calendar");
    const modal = document.getElementById("modal");
    const modalContent = document.querySelector(".modal-content-main");
    const modalBtn = document.querySelector(".modal-btn");
    const closeBtn = document.querySelector(".close");
    // Initialize current date
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    let eventDates = [];

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
            day.classList.add("day-number");
            day.textContent = i;

            day.addEventListener("click", function() {
                var AM = $(day).hasClass("AM");
                var PM = $(day).hasClass("PM");
                var firstLiText = $('.level-item ul li:first').text();
                if(firstLiText == "Nurse" || firstLiText == "Admin"){
                    if($(day).hasClass('event')){
                        check = true;
                        showModal(monthName, i, year, check, AM, PM);
                    }else{
                        check = false;
                        showModal(monthName, i, year, check, AM, PM);
                    }
                }else{
                    if($(day).hasClass('event')){
                        showModalClient(monthName, i, year, AM, PM);
                    }else{
                        alert("You are not authorized to view this page");
                    }
                    // showModalClient(monthName, i, year);
                    // alert("You are not authorized to view this page");
                }
                
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
        
        var dayCells = document.querySelectorAll('.day-number');
        $.ajax({
            url: "backend/get-slots-clearance.php",
            method: "GET",
            dataType: "json",
            success: function(data) {
                // var response = JSON.parse(data);
                data.forEach(function(date) {
                    // eventDates.push({ thisdata: date });
                    const eventDate = new Date(date.date);
                    const eventMonth = eventDate.getMonth();
                    const eventYear = eventDate.getFullYear();
                    const dayOfMonth = eventDate.getDate();
                    // console.log(dayOfMonth);
                    if(eventMonth === month && eventYear === year){
                        dayCells.forEach(function(cell) {
                            if(parseInt(cell.textContent) === dayOfMonth){
                                cell.classList.add('event');
                                cell.classList.add(date.time);
                            }
                        });
                    }
                });              
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });

        // var eventDates = JSON.parse(localStorage.getItem('eventDates')) || [];
        // var dayCells = document.querySelectorAll('.day-number');
        // eventDates.forEach(function(date) {
        //     const eventDate = new Date(date.date);
        //     const eventMonth = eventDate.getMonth();
        //     const eventYear = eventDate.getFullYear();
        //     const dayOfMonth = eventDate.getDate();
        //     // console.log(date);

        //     if (eventMonth === month && eventYear === year) {
        //         dayCells.forEach(function(dayCell) {
        //             if (parseInt(dayCell.textContent) === dayOfMonth) {
        //                 dayCell.classList.add('event');
        //             }
        //         });
        //     };
            
        // });
        

        btnContainer.appendChild(prevBtn);
        btnContainer.appendChild(nextBtn);
        calendar.appendChild(btnContainer);
    }

    function showModal(month, day, year, check, AM, PM) {
        modal.style.display = "block";
        modalContent.innerHTML = `<p>Slots on ${month} ${day}, ${year}</p>`;

        const modalBtn1 = document.createElement("button");
        const modalBtn2 = document.createElement("button");

        modalBtn1.textContent = "Set AM slot";
        modalBtn2.textContent = "Set PM slot";

        modalBtn1.classList.add("modal-btn", "sched-btn");
        modalBtn2.classList.add("modal-btn", "sched-btn");

        if(check == true){
            if(AM == true){
                modalBtn1.textContent = "Remove AM slot";
                modalBtn1.classList.add("modal-btn", "sched-btn", "del-btn");
            }
            if(PM == true){
                modalBtn2.textContent = "Remove PM slot";
                modalBtn2.classList.add("modal-btn", "sched-btn", "del-btn");
            }
            // if(time == 'AM'){
            //     modalBtn1.textContent = "Remove AM slot";
            //     modalBtn1.classList.add("modal-btn", "sched-btn", "del-btn");
            // }else{
            //     modalBtn2.textContent = "Remove PM slot";
            //     modalBtn2.classList.add("modal-btn", "sched-btn", "del-btn");
            // }
            // modalBtn1.classList.add("modal-btn", "sched-btn", "del-btn");
            // modalBtn2.classList.add("modal-btn", "sched-btn", "del-btn");
        }else{
            modalBtn1.textContent = "Set AM slot";
            modalBtn2.textContent = "Set PM slot";
            modalBtn1.classList.add("modal-btn", "sched-btn");
            modalBtn2.classList.add("modal-btn", "sched-btn");
        }
        modalBtn1.setAttribute("id", "sched-btn");
        modalBtn1.setAttribute("data-target-sched-btn", "AM");
        modalBtn1.setAttribute("data-target-day", month + " " + day + " " + year);

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
                var target;
                if($(button).hasClass('del-btn')){
                    target = true;
                    setSchedule(targetValue, targetDay, target);
                }else{
                    target = false;
                    setSchedule(targetValue, targetDay, target);
                }
            });
        });
    }

    function showModalClient(month, day, year, AM, PM) {
        modal.style.display = "block";
        modalContent.innerHTML = `<p>Slots on ${month} ${day}, ${year}</p>`;

        const modalBtn1 = document.createElement("button");
        const modalBtn2 = document.createElement("button");

        modalBtn1.textContent = "Set AM";
        modalBtn2.textContent = "Set PM";

        modalBtn1.classList.add("modal-btn", "sched-btn");
        modalBtn2.classList.add("modal-btn", "sched-btn");

        modalBtn1.setAttribute("id", "sched-btn");
        modalBtn1.setAttribute("data-target-sched-btn", "AM");
        modalBtn1.setAttribute("data-target-day", month + " " + day + " " + year);

        modalBtn2.setAttribute("id", "sched-btn");
        modalBtn2.setAttribute("data-target-sched-btn", "PM");
        modalBtn2.setAttribute("data-target-day", month + " " + day + " " + year);

        if(AM == true){
            modalContent.appendChild(modalBtn1); 
        }
        if(PM == true){
            modalContent.appendChild(modalBtn2);
        }
        

        const modalButtons = document.querySelectorAll('.sched-btn');
        modalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const targetValue = button.getAttribute('data-target-sched-btn');
                const targetDay = button.getAttribute('data-target-day');
                setScheduleClient(targetValue, targetDay);
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

function setSchedule(targetValue, targetDay, check) {
    $.ajax({
        type: "POST",
        url: "backend/set-schedule.php?user=nurse",
        data: {
            targetValue: targetValue,
            targetDay: targetDay,
            targetConfig: check
        },
        success: function(response) {
            console.log(response); 

        } 
        
    });
}

function setScheduleClient(targetValue, targetDay) {
    $.ajax({
        type: "POST",
        url: "backend/set-schedule.php?user=client",
        data: {
            targetValue: targetValue,
            targetDay: targetDay,
        },
        success: function(response) {
            console.log(response); 
        } 
        
    });
}

function formatDate(date) {
    const dateObj = new Date(date);
    const options = { month: "long", day: "numeric", year: "numeric" };
    return dateObj.toLocaleDateString("en-US", options);
  }