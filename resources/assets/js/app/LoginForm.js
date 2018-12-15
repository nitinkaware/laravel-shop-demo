function validateForm() {
    var userName = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;
    if (userName == null || userName == "") {
        alert("User Name must be filled out");
        return false;
    }
    if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }
    if (userName.indexOf("@") >  - 1) {

        var arr = userName.split("@");
        var userLogin = arr[0];
        var domainName = arr[1];
        var domains="gov.in,nic.in,upstf.com,kochicitypolice.org,bsnl.co.in,mppolice.gov.in,mahapolice.gov.in,incometax.gov.in,maharashtra.gov.in,nagpurpolice.nic.in,hry.nic.in,jkpolice.gov.in,policewb.gov.in,kolkatapolice.gov.in,ksp.gov.in,jhpolice.gov.in,gujart.gov.in,cbi.gov.in,gujarat.gov.in,delhipolice.gov.in,goapolice.gov.in,apint.org,nodal.tspolice.gov.in,ril.com,assampolice.gov.in,nagpurpolice.gov.in";
        var domainList = domains.split(",");
        for (i = 0; i < domainList.length; i++) {
            if ( domainList[i].toUpperCase() == domainName.toUpperCase()) {
                return true;
            }
        }
        alert("Invalid UserLogin !!! ");
        return false;

    }
}