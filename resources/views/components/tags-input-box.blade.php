<style>
    li {
        display: inline-block;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 4px;
        padding: 4px 10px;
        margin-right: 4px;
        margin-bottom: 4px;
    }
</style>

<div class="inline-block border border-neutral-60 text-base rounded-sm p-2 w-full">
    <ul class="list-none p-0 flex flex-wrap min-h-\[20px\] px-1 text-neutral-60" id="tags"></ul>
    <div class="flex items-center">
        <input
            class="flex-1 border-none outline-none p-1 text-base placeholder:text-neutral-60 focus:outline-none active:outline-none focus:ring-0"
            type="text" id="input-tag" placeholder="Enter tag name" />
        <button id="addTagButton"
            class="w-fit bg-secondary-300 text-neutral-30 rounded-sm h-fit p-[2px] disabled:bg-secondary-100 disabled:cursor-not-allowed"
            disabled>Add</button>
    </div>
    <input name="tags" type="hidden" id="hiddenInput" value="">
</div>

<script>
    const tags = document.getElementById('tags');
    const input = document.getElementById('input-tag');
    const addTagButton = document.getElementById('addTagButton');
    const hiddenInput = document.getElementById('hiddenInput');

    function updateTextNode() {
        const textNode = tags.firstChild;

        if (tags.childElementCount === 0) {
            if (!textNode || textNode.nodeType !== Node.TEXT_NODE) {
                const newTextNode = document.createTextNode("[Your tags will be shown here]");
                tags.appendChild(newTextNode);
            }
        } else {
            if (textNode && textNode.nodeType === Node.TEXT_NODE) {
                tags.removeChild(textNode);
            }
        }
    }

    function updateHiddenInput() {
        const tagValues = Array.from(tags.querySelectorAll('li')).map(li => li.innerText.trim());
        hiddenInput.value = tagValues.join(', ');
    }

    updateTextNode();
    updateHiddenInput();

    function addTag() {
        const tagContent = input.value.trim();

        if (tagContent !== '') {
            const tag = document.createElement('li');
            tag.innerText = tagContent;
            tag.innerHTML +=
                '<button class="delete-button bg-transparent border-none text-secondary-300 cursor-pointer ml-1">X</button>';
            tags.appendChild(tag);
            input.value = '';
            addTagButton.disabled = true;
            updateTextNode();
            updateHiddenInput();
        }
    }

    input.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            addTag();
        }
    });

    addTagButton.addEventListener('click', addTag);

    input.addEventListener('input', function() {
        addTagButton.disabled = input.value.trim() === '';
    });

    tags.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-button')) {
            event.target.parentNode.remove();
            updateTextNode();
            updateHiddenInput();
        }
    });
</script>
