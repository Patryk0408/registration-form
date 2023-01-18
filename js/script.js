{
    const validationName = () => {
        const names = document.querySelectorAll(".js-name");
        const lettersRegex = /^[A-Za-z]+$/;

        names.forEach(name => {
            name.addEventListener("blur", () => {
                const nameValue = name.value;
                if (!lettersRegex.test(nameValue)) {
                    alert("Imię i nazwisko musi zawierać tylko litery!");
                    name.value = "";
                };
            });
        });
    };

    const consoleLog = () => {
        console.log("Cześć, skrypt działa. Zablokowane jest wysyłanie formularza :)")
    }

    const onFormSubmit = (event) => {
        event.preventDefault();
        
        consoleLog();
      };

    const init = () => {
        validationName();
        
        const form = document.querySelector(".js-form");

        form.addEventListener("submit", onFormSubmit);
    };

    init();
}    