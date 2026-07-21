const dateInput = document.querySelector('input[name="tanggal"]');
const timeSelect = document.querySelector('#jam-layanan');

function bookedSlots() {
    if (!timeSelect) {
        return {};
    }

    try {
        return JSON.parse(timeSelect.dataset.bookedSlots || '{}');
    } catch (error) {
        return {};
    }
}

function updateTimeSlots() {
    if (!dateInput || !timeSelect) {
        return;
    }

    const selectedDate = dateInput.value;
    const unavailable = new Set(bookedSlots()[selectedDate] || []);

    Array.from(timeSelect.options).forEach((option) => {
        if (option.value === '') {
            return;
        }

        const isBooked = unavailable.has(option.value);
        option.disabled = isBooked;
        option.textContent = isBooked
            ? `${option.value.replace(':', '.')} WIB - sudah dipilih`
            : `${option.value.replace(':', '.')} WIB`;
    });

    if (timeSelect.value && unavailable.has(timeSelect.value)) {
        timeSelect.value = '';
    }
}

dateInput?.addEventListener('change', updateTimeSlots);
updateTimeSlots();
