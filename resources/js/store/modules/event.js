import {deleteRequest, getRequest, postRequest} from "../api";

export default {
    state: {
        event: null,
        events: null,
        eventError: null,
    },
    getters: {
        getEvent: state => state.event,
        getEvents: state => state.events,
        getEventError: state => state.eventError,
    },
    mutations: {
        setEventError(state, data) {
            state.eventError = data
        },
        setEvent(state, data) {
            state.event = data
        },
        setEvents(state, data) {
            state.events = data
        },
    },
    actions: {
        createEvent({commit}, data) {
            return postRequest('event', data, commit)
                .catch(error => {
                    commit('setEventError', error.message)
                    return Promise.reject(error)
                });
        },
        getEvents({commit}, data) {
            return getRequest('event', '', commit)
                .then(response => {
                    commit('setEvents', response.data)
                });
        },
        getEvent({commit}, id) {
            return getRequest(`event/${id}`, '', commit)
                .then(response => {
                    commit('setEvent', response.data)
                });
        },
        joinEvent({commit}, id) {
            return postRequest(`event/participant/${id}`, '', commit)
        },
        cancelJoinEvent({commit}, id) {
            return deleteRequest(`event/participant/${id}`, '', commit)
        },
        deleteEvent({commit}, id) {
            return deleteRequest(`event/${id}`, '', commit)
        },
    },
}
