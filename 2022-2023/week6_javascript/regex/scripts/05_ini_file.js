/*
INI files look like this

; last modified 1 April 2001 by John Doe
[owner]
name = John Doe
organization = Acme Widgets Inc.

[database]
; use IP address in case network name resolution is not working
server = 192.0.2.62     
port = 143
file = "payroll.dat"
*/

const parseINI = string => {
    let result = {};
    let section = result;
    string.split(/\n/).forEach(line => {
        if (match = line.match(/^(\w+)\s?=\s?(.*)$/)) {
            section[match[1]] = match[2];
        } else if (match = line.match(/^\[(.*)\]$/)) {
            section = result[match[1]] = {};
        } else if (!/^\s*(;.*)?$/.test(line)) {
            throw new Error("Line '" + line + "' is not valid.");
        }
    });
    return result;
}

console.log(parseINI(`
; last modified 1 April 2001 by John Doe
[owner]
name = John Doe
organization=Acme Widgets Inc.

[database]
; use IP address in case network name resolution is not working
server=192.0.2.62     
port=143
file=payroll.dat
`
));