function searchPosts() {
    return {
        search: '',
        results: [],
        loading: false,
        searched: false,
        controller: null,
        requestId: 0,

        handleSearch() {
            if (this.search.length <= 2) {
                if (this.controller) this.controller.abort();

                this.results = [];
                this.loading = false;
                this.searched = false;
                return;
            }

            const currentRequestId = ++this.requestId;

            if (this.controller) this.controller.abort();

            this.controller = new AbortController();
            const currentSearch = this.search;

            this.loading = true;
            this.searched = true;

            fetch(`/my-posts/search?query=${encodeURIComponent(this.search)}`, {
                signal: this.controller.signal
            })
            .then(res => {
                if (!res.ok) throw new Error();
                return res.json();
            })
            .then(data => {
                if (
                    this.controller.signal.aborted ||
                    currentRequestId !== this.requestId ||
                    currentSearch !== this.search
                ) return;

                this.results = data.data;
                this.loading = false;
            })
            .catch(() => {
                if (
                    this.controller.signal.aborted ||
                    currentRequestId !== this.requestId
                ) return;

                this.results = [];
                this.loading = false;
            });
        }
    }
}

export default searchPosts
