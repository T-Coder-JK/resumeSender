export function textPanel(id, title = "title", content = "") {
    //create the panel content container
    const container = document.createElement("div");
    container.id = id;
    container.className = "container";
    //create a child element header shows title of the panel
    const header = document.createElement("div");
    header.className = "header";
    header.textContent = title;
    //create the content wrapper
    const contentWrapper = document.createElement("div");
    contentWrapper.className = "content-wrapper";
    //create element which contains text content
    const text = document.createElement("p");
    text.className = "content-text";
    text.innerHTML = content;
    contentWrapper.append(text);

    container.append(header, contentWrapper);
    return container;
}
