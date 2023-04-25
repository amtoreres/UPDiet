$(document).ready(function(){
    $(".info-name").text(db_nm);
    $(".info-em").text(db_em);
    $(".info-num").text(db_num);
    $(".info-loc").text(db_loc);
    $(".info-date").text(`Joined ${db_date}.`);

    if(db_p_pic == "") $(".photo-profile").find("img").attr("src", "../img/user.png");
    else {
        $(".photo-profile").find("img").attr("src", `../${db_p_pic}?${new Date().getTime()}`);
    }

    if(db_p_cov != "") {
        $(".photo-cover").append($("<img>", {"src": `../${db_p_cov}?${new Date().getTime()}`}));
    }
});