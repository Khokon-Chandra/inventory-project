
const loadTableHeader = ((data) => {
    return `<thead><tr> ${data.map((item) => {
        return `<th>${item.fieldName}</th>`;
    }).join('')}</tr></thead>`;
})(thead);

const loadTableBody = (tableHead, tableData) => {
    return `<tbody>${tableData.map((row,index) => {
        return `<tr>${tableHead.map((head) => {
            if(head.data !== 'sn'){

            }else{
                if(head.len !== undefined)
                return `<td>${index+1}</td>`;
            }
        }).join('')}</tr>`;
    }).join('')}</tbody>`;
}

async function loadTableResponse(url, table) {
    const response = await fetch(url);
    const { current_page, first_page_url, from, last_page, last_page_url, links, next_page_url, per_page, prev_page_url, total, data } = await response.json();
   const body = loadTableBody(thead,data);
   table.innerHTML = loadTableHeader+body;
}

$(document).ready(function () {
    const table = document.querySelector('table');
    loadTableResponse(api_url, table);
})
